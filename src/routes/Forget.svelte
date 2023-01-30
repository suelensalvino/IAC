<!-- Javascript -->
<script>
  // @ts-nocheck
  import Button from "../components/Button.svelte";
  import { Link } from "svelte-navigator";
  import axios from "axios";
  import ForgetPassword from "../components/modals/ForgetPassword.svelte";

  let resposta = "";
  let email = "";

  let showModal = false;

  const emailVerify = async () => {
    const url = "http://localhost:8000/read-users.php";
    const data = new FormData();
    data.append("email", email);
    data.append("resposta", resposta);

    axios.get(url).then((response) => {
      const validacaoUser = response.data;

      const filtrandoEmail = validacaoUser.map((validando) => {
        return validando.ALU_EMAIL;
      });
      const filtrandoReposta = validacaoUser.map((validando) => {
        return validando.ALU_RESPOSTA;
      });

      let filtrandoEmailEspecifico = filtrandoEmail.find(
        (element) => element === email
      );

      let filtrandoRespostaEspecifica = filtrandoReposta.find(
        (element) => element === resposta
      );
      if (
        filtrandoEmailEspecifico === email &&
        filtrandoRespostaEspecifica === resposta
      ) {
        sessionStorage.setItem("email", email);
        console.log(sessionStorage.getItem("email"));
        showModal = true;
      } else {
        alert("Usuário não encontrado");
      }
    });
  };
</script>

<!-- HTML -->
<form
  class="flex flex-col gap-2 w-[500px] mt-8"
  on:submit|preventDefault={emailVerify}
>
  <div class="flex flex-col w-full gap-1">
    <!-- svelte-ignore a11y-label-has-associated-control -->
    <input
      type="email"
      name="email"
      placeholder="Insira seu email institucional"
      bind:value={email}
      class="py-3 px-4 rounded bg-gray-900 text-white placeholder:text-gray-700 mb-2"
      required
      id="email"
    />
    <input
      type="text"
      name="resposta"
      placeholder="Insira sua resposta secreta"
      bind:value={resposta}
      class="py-3 px-4 rounded bg-gray-900 text-white placeholder:text-gray-700 mb-2"
      required
      id="email"
    />
    <Button on:click={() => (showModal = true)}
      ><span slot="button-child">Recuperar senha</span></Button
    >
    <p class="text-gray-300 text-center mt-4 font-bold">
      Insira o seu email institucional e sua senha secreta para cadastrar uma
      nova senha e recuperar sua conta!
    </p>
  </div>
</form>

{#if showModal}
  <!-- svelte-ignore missing-declaration -->
  <ForgetPassword on:close={() => (showModal = false)} />
{/if}
