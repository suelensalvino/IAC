<script>
  import Button from "../components/Button.svelte";
  let nome = "";
  let email = "";
  let matricula = "";
  let resposta = "";
  let senha = "";
  let confSenha = "";

  function createUser() {
    if (senha != confSenha) return;
    let form = new FormData();
    form.append("nome", nome);
    form.append("email", email);
    form.append("matricula", matricula);
    form.append("resposta", resposta);
    form.append("senha", senha);
    fetch("http://localhost:8000/create-user.php", {
      method: "POST",
      body: form,
    });
  }
</script>

<form
  class="flex flex-col gap-2 mx-w-[500px] mt-6"
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
      bind:value={email}
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
      bind:value={matricula}
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
      bind:value={resposta}
      class="py-3 px-4 rounded bg-gray-900 text-white placeholder:text-gray-700"
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
      class="py-3 px-4 rounded bg-gray-900 text-white placeholder:text-gray-700"
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
      class="py-3 px-4 mb-2 rounded bg-gray-900 text-white placeholder:text-gray-700"
    />
  </div>
  {#if senha != "" && senha != confSenha}
    <div class="danger">Senhas não conferem</div>
  {/if}
  <Button><span slot="button-child">Cadastre-se no sistema</span></Button>
</form>
