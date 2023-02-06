<script>
  import { currentPage, isLogged } from "../data-users";

  function logout() {
    fetch("http://localhost:8000/logout.php", {
      credentials: "include",
    });
    $isLogged = false;
    $currentPage = "index";
  }
</script>

<div class="flex gap-4 justify-center text-white font-semibold w-full min-[320px]:mx-4">
  {#if !$isLogged}
    <button
      class="bg-green-800 min-[650px]:py-3 min-[650px]:px-4 rounded hover:bg-green-900 transition-all min-[320px]:py-1 min-[320px]:px-1"
      on:click={() => ($currentPage = "login")}>Início</button
    >
    <button
      class="bg-green-800 min-[650px]:py-3 min-[650px]:px-4 rounded hover:bg-green-900 transition-all min-[320px]:py-1 min-[320px]:px-1"
      on:click={() => ($currentPage = "register")}
    >
      Cadastre-se
    </button>
    <button
      class="bg-green-800 min-[650px]:py-3 min-[650px]:px-4 rounded hover:bg-green-900 transition-all min-[320px]:py-1 min-[320px]:px-1"
      on:click={() => ($currentPage = "forget")}>Esqueci a senha</button
    >
  {:else}
    <button
      class="bg-green-800 min-[650px]:py-3 min-[650px]:px-4 rounded hover:bg-green-900 transition-all min-[320px]:py-1 min-[320px]:px-1"
      on:click={() => ($currentPage = "home")}
    >
      Home
    </button>
    <button
      class="bg-green-800 min-[650px]:py-3 min-[650px]:px-4 rounded hover:bg-green-900 transition-all min-[320px]:py-1 min-[320px]:px-1"
      on:click={logout}
    >
      Sair
    </button>
  {/if}
</div>
