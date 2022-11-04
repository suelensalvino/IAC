<script>
  import { Router, Route, Link } from "svelte-navigator";
  import Button from "../components/Button.svelte";
</script>

<Router path="SignIn">
  <form class="flex flex-col gap-2 w-full mt-8">
    <div class="flex flex-col w-full gap-1" />
    <div class="flex flex-col w-full gap-1">
      <label for="user" class="text-gray-100">Insira sua Matrícula</label>
      <input
        type="text"
        maxlength="14"
        placeholder="0000TSIIG0000"
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
        required
        class="py-3 px-4 rounded bg-gray-900 text-white placeholder:text-gray-700"
      />
    </div>
    <Button />
  </form>

  <footer
    class="w-full mt-[35px] text-center flex flex-col text-gray-500  underline"
  >
    <Link class="hover:text-gray-400" to="/">Esqueceu sua senha?</Link>
    <Link class="hover:text-gray-400" to="/SignUp"
      >Já possui uma conta? Entre aqui!</Link
    >
  </footer>
</Router>
