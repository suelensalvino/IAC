<!-- Javascript -->
<script>
  import { onMount } from "svelte";
  import ChangePassword from "../modals/ChangePassword.svelte";

  const url = "http://localhost:8000/get-user.php";
  let user = [];

  async function exibirUsuario() {
    const response = await fetch(url, {
      credentials: "include",
    });

    user = await response.json();
  }
  onMount(() => {
    exibirUsuario();
  });

  let showModal = false;
</script>

<!-- HTML -->
<h1
  class="min-[320px]:mt-4 min-[769px]:mt-0 font-semibold text-3xl text-white border-b-2 pb-1 border-white/20"
>
  Minha conta
</h1>
<div class="flex flex-col">
  {#each user as u}
    <div class="font-semibold text-green-800 text-3xl text-center mb-2">
      Bem vindo(a), {u.ALU_NOME}
    </div>
    <ul class="font-medium text-white text-xl flex flex-col gap-4 mt-2">
      <li
        class="flex flex-col text-center gap-2 border-b-[1px] border-slate-200/40 mb-2 pb-4"
      >
        <span class="text-2xl">Seu email</span>
        <span class="bg-slate-500 rounded text-zinc-200 font-semibold py-2 px-4"
          >{u.ALU_EMAIL}</span
        >
      </li>
      <li
        class="flex flex-col text-center gap-2 border-b-[1px] border-slate-200/40 mb-2 pb-4"
      >
        <span class="text-2xl">Sua matricula </span>
        <span class="bg-slate-500 rounded text-zinc-200 font-semibold py-2 px-4"
          >{u.ALU_MATRICULA}</span
        >
      </li>
      <li
        class="flex flex-col text-center gap-2 border-b-[1px] border-slate-200/40 mb-2 pb-4"
      >
        <span class="text-2xl"> Sua resposta secreta </span>
        <span class="bg-slate-500 rounded text-zinc-200 font-semibold py-2 px-4"
          >{u.ALU_RESPOSTA}</span
        >
      </li>
    </ul>
  {/each}
  <button
    class="mt-8 bg-green-800 py-2 px-4 rounded text-white font-medium hover:bg-green-900 transition-all"
    on:click={() => (showModal = true)}
  >
    Alterar senha
  </button>
</div>

{#if showModal}
  <ChangePassword on:close={() => (showModal = false)} />
{/if}
