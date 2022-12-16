<!-- Javascript -->
<script>
  // @ts-nocheck
  import Button from "../components/Button.svelte";
  import { Router, Link } from "svelte-navigator";

  export let user = {};
  const emailVerify = async () => {
    const updateRoute = "http://localhost:8000/create-user.php";
    const data = new FormData();
    data.append("email", user.email);
    let res = await fetch(updateRoute, {
      method: "POST",
      body: data,
    });
  };
</script>

<!-- HTML -->
<form
  class="flex flex-col gap-2 w-full mt-8"
  on:submit|preventDefault={emailVerify}
  method="get"
>
  <div class="flex flex-col w-full gap-1">
    <!-- svelte-ignore a11y-label-has-associated-control -->
    <input
      type="email"
      name="email"
      placeholder="Insira seu email institucional"
      bind:value={user.email}
      class="py-3 px-4 rounded bg-gray-900 text-white placeholder:text-gray-700 mb-2"
      required
      id="email"
    />
    <Button><span slot="button-child">Recuperar senha</span></Button>
    <p class="text-gray-300 text-center mt-4 font-bold">
      Insira o seu email institucional para recuperar sua conta, e siga as
      instruções!
    </p>
  </div>
  <footer
    class="w-full mt-[35px] text-center flex flex-col text-gray-500  underline"
  >
    <Link class="hover:text-gray-400" to="/SignIn"
      >Já possui uma conta? Entre aqui!</Link
    >
    <Link class="hover:text-gray-400" to="/SignUp"
      >Não possui uma conta? Cadastre-se!</Link
    >
  </footer>
</form>
