<script>
  import Button from "../components/Button.svelte";
  import axios from "axios";
  import { currentPage } from "../data-users";
  let nome = "";
  let email = "";
  let matricula = "";
  let resposta = "";
  let senha = "";
  let confSenha = "";

  async function createUser() {
    if (senha != confSenha) return;
    let form = new FormData();
    form.append("nome", nome);
    form.append("email", email);
    form.append("matricula", matricula);
    form.append("resposta", resposta);
    form.append("senha", senha);

    const url = "http://localhost:8000/validation-create-user.php";

    axios.get(url).then((response) => {
      const validacaoUser = response.data;

      const filtrandoMatricula = validacaoUser.map((validando) => {
        return validando.ALU_MATRICULA;
      });
      const filtrandoEmail = validacaoUser.map((validando) => {
        return validando.ALU_EMAIL;
      });

      let filtrandoMatriculaEspecifico = filtrandoMatricula.find(
        (element) => element === matricula
      );

      let filtrandoEmailEspecifico = filtrandoEmail.find(
        (element) => element === email
      );

      if (
        filtrandoMatriculaEspecifico === matricula ||
        filtrandoEmailEspecifico === email
      ) {
        alert("Matricula/Email já existente! Tente novamente.");
      } else {
        fetch("http://localhost:8000/create-user.php", {
          method: "POST",
          body: form,
        });

        $currentPage = "index";
      }
    });
  }
</script>

<form
  class="flex flex-col gap-2 min-[650px]:w-[500px] mt-6 min-[320px]:w-[300px]"
  on:submit|preventDefault={createUser}
>
  <div class="flex flex-col w-full gap-1">
    <label for="user" class="text-gray-100">Insira seu nome</label>
    <input
      type="text"
      name="nome"
      placeholder="Seu nome"
      required
      bind:value={nome}
      class="min-[650px]:py-2 min-[650px]:px-4 rounded bg-gray-900 text-white placeholder:text-gray-700 min-[320px]:py-2 min-[320px]:px-4 transition-all"
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
      bind:value={email}
      class="min-[650px]:py-2 min-[650px]:px-4 rounded bg-gray-900 text-white placeholder:text-gray-700 min-[320px]:py-2 min-[320px]:px-4 transition-all"
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
      bind:value={matricula}
      class="min-[650px]:py-2 min-[650px]:px-4 rounded bg-gray-900 text-white placeholder:text-gray-700 min-[320px]:py-2 min-[320px]:px-4 transition-all"
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
      bind:value={resposta}
      class="min-[650px]:py-2 min-[650px]:px-4 rounded bg-gray-900 text-white placeholder:text-gray-700 min-[320px]:py-2 min-[320px]:px-4 transition-all"
    />
  </div>
  <div class="flex flex-col w-full gap-1">
    <label for="user" class="text-gray-100">Insira sua senha</label>
    <input
      type="password"
      name="senha"
      minlength="8"
      maxlength="20"
      placeholder="*************"
      required
      bind:value={senha}
      class="min-[650px]:py-2 min-[650px]:px-4 rounded bg-gray-900 text-white placeholder:text-gray-700 min-[320px]:py-2 min-[320px]:px-4 transition-all"
    />
  </div>
  <div class="flex flex-col w-full gap-1">
    <label for="user" class="text-gray-100">Confirme sua senha</label>
    <input
      type="password"
      name="senha"
      minlength="8"
      maxlength="20"
      placeholder="*************"
      required
      bind:value={confSenha}
      class="min-[650px]:py-2 min-[650px]:px-4 mb-2 rounded bg-gray-900 text-white placeholder:text-gray-700 min-[320px]:py-2 min-[320px]:px-4 transition-all"
    />
  </div>
  {#if senha != "" && senha != confSenha}
    <div
      class="fixed bottom-1 right-1 bg-red-500 py-2 px-2 text-white font-semibold w-24 text-center"
    >
      Senhas não conferem
    </div>
  {/if}
  <Button><span slot="button-child">Cadastre-se no sistema</span></Button>
</form>
