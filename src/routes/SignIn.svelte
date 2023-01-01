<script>
  import { currentPage, isLogged } from "../data-users";
  import Button from "../components/Button.svelte";
  import { Link } from "svelte-navigator";

  let matricula = '';
  let senha = '';

  async function validateLogin(){
      const form = new FormData();
      form.append('matricula', matricula);
      form.append('senha', senha);

      const response = await fetch("http://localhost:8000/login.php", {
          method: "POST",
          body: form,
          credentials: "include",
      });
      
      if (!response.ok) {
          alert("Usuário ou senha incorreto");
      return;
  }

  $isLogged = true;
  $currentPage = 'home';
}
</script>

<form
class="flex flex-col gap-2 w-full mt-8"
on:submit|preventDefault={validateLogin}
>
<div class="flex flex-col w-full gap-1">
<label for="user" class="text-gray-100">Insira sua Matrícula</label>
<input
  type="text"
  maxlength="14"
  placeholder="0000TSIIG0000"
  bind:value={matricula}
  required
  class="py-3 px-4 rounded bg-gray-900 text-white placeholder:text-gray-700"
/>
</div>
<div class="flex flex-col w-full gap-1 mb-8">
<label for="user" class="text-gray-100">Insira sua Senha</label>
<input
  type="password"
  minlength="8"
  maxlength="20"
  placeholder="*************"
  bind:value={senha}
  required
  class="py-3 px-4 rounded bg-gray-900 text-white placeholder:text-gray-700"
/>
</div>
<Button><span slot="button-child">Entrar no sistema</span></Button>
</form>

<footer
class="w-full mt-[35px] text-center flex flex-col text-gray-500  underline"
>
<a class="hover:text-gray-400" href="/Forget">Esqueceu sua senha?</a>
<a class="hover:text-gray-400" href="/SignUp"
>Não possui uma conta? Cadastre-se!</a
>
</footer>
