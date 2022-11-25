<script>
// @ts-nocheck

  import Button from "../components/Button.svelte";
  import { Router, Route, Link } from "svelte-navigator";

  export let user = {};

  const createUser = async () => {
    const updateRoute = "http://localhost:8000/create-user.php";
    const data = new FormData();
    data.append("nome", user.nome);
    data.append("email", user.email);
    data.append("matricula", user.matricula);
    data.append("resposta", user.resposta);
    data.append("senha", user.senha);
    let res = await fetch(updateRoute, {
      method: "POST",
      body: data,
    });
  };
</script>

<Router path="SignUp">
  <form class="flex flex-col gap-2 w-full mt-8" method="post" on:submit|preventDefault={createUser}>
    <div class="flex flex-col w-full gap-1">
      <label for="user" class="text-gray-100">Insira seu nome</label>
      <input
        type="text"
        name="nome"
        placeholder="Seu nome"
        required
        bind:value={user.nome}
        class="py-3 px-4 rounded bg-gray-900 text-white placeholder:text-gray-700"
      />
    </div>
    <div class="flex flex-col w-full gap-1">
      <label for="user" class="text-gray-100"
        >Insira seu e-mail institucional</label
      >
      <input
        type="email"
        name="email"
        placeholder="aluno@ifpe.edu.br.com"
        required
        bind:value={user.email}
        class="py-3 px-4 rounded bg-gray-900 text-white placeholder:text-gray-700"
      />
    </div>
    <div class="flex flex-col w-full gap-1">
      <label for="user" class="text-gray-100">Insira sua matrícula</label>
      <input
        type="text"
        name="matricula"
        maxlength="14"
        placeholder="0000TSIIG0000"
        required
        bind:value={user.matricula}
        class="py-3 px-4 rounded bg-gray-900 text-white placeholder:text-gray-700"
      />
    </div>
    <div class="flex flex-col w-full gap-1">
      <label for="user" class="text-gray-100"
        >Qual o nome do seu primeiro animal de estimação?</label
      >
      <input
        type="text"
        name="resposta"
        placeholder="Nome do animal"
        required
        bind:value={user.resposta}
        class="py-3 px-4 rounded bg-gray-900 text-white placeholder:text-gray-700"
      />
    </div>
    <div class="flex flex-col w-full gap-1 mb-8">
      <label for="user" class="text-gray-100">Insira sua senha</label>
      <input
        type="password"
        name="senha"
        minlength="8"
        maxlength="20"
        placeholder="*************"
        required
        bind:value={user.senha}
        class="py-3 px-4 rounded bg-gray-900 text-white placeholder:text-gray-700"
      />
    </div>
    <Button />
  </form>

  <footer
    class="w-full mt-[35px] text-center flex flex-col text-gray-500  underline"
  >
    <Link class="hover:text-gray-400" to="/">Esqueceu sua senha?</Link>
    <Link class="hover:text-gray-400" to="/SignIn"
      >Já possui uma conta? Entre aqui!</Link
    >
  </footer>
</Router>
