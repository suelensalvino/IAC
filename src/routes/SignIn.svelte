<script>
  // @ts-nocheck

  import { Router, Link } from "svelte-navigator";
  import Button from "../components/Button.svelte";

  export let user = {};

  const validateLogin = async () => {
    const updateRoute = "http://localhost:8000/login.php";
    const data = new FormData();
    data.append("matricula", user.matricula);
    data.append("senha", user.senha);
    let res = await fetch(updateRoute, {
      method: "POST",
      body: data,
    });
  };
</script>

<Router path="SignIn">
  <form
    class="flex flex-col gap-2 w-full mt-8"
    on:submit|preventDefault={validateLogin}
  >
=======
  import { Router, Route, Link } from "svelte-navigator";
  import ButtonSignIn from "../components/ButtonSignIn.svelte";

  export let user = {};

const validateLogin = async () => {
  const updateRoute = "http://localhost:8000/login.php";
  const data = new FormData();
  data.append("matricula", user.matricula);
  data.append("senha", user.senha);
  let res = await fetch(updateRoute, {
    method: "POST",
    body: data,
  });
};
</script>

<Router path="SignIn">
  <form class="flex flex-col gap-2 w-full mt-8" on:submit|preventDefault={validateLogin}>
    <div class="flex flex-col w-full gap-1" />
>>>>>>> fd04ba14e16517ea1ba8037a4806dc4456fca9d3
    <div class="flex flex-col w-full gap-1">
      <label for="user" class="text-gray-100">Insira sua Matrícula</label>
      <input
        type="text"
        maxlength="14"
        placeholder="0000TSIIG0000"
        bind:value={user.matricula}
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
        bind:value={user.senha}
        required
        class="py-3 px-4 rounded bg-gray-900 text-white placeholder:text-gray-700"
      />
    </div>
<<<<<<< HEAD
    <Button><span slot="button-child">Entrar no sistema</span></Button>
=======
    <ButtonSignIn />
>>>>>>> fd04ba14e16517ea1ba8037a4806dc4456fca9d3
  </form>

  <footer
    class="w-full mt-[35px] text-center flex flex-col text-gray-500  underline"
  >
    <Link class="hover:text-gray-400" to="/Forget">Esqueceu sua senha?</Link>
    <Link class="hover:text-gray-400" to="/SignUp"
      >Não possui uma conta? Cadastre-se!</Link
    >
<<<<<<< HEAD
</footer>
</Router>
=======
  </footer>
</Router>
>>>>>>> fd04ba14e16517ea1ba8037a4806dc4456fca9d3
