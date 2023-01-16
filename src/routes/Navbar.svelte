<script>
  import { currentPage, isLogged } from "../data-users";

  export function logout() {
    fetch("http://localhost:8000/logout.php", {
      credentials: "include",
    });
    $isLogged = false;
    $currentPage = "index";
    sessionStorage.clear();
  }
</script>

<div class="flex gap-4 justify-center text-white font-semibold">
  {#if !$isLogged}
    <button
      class="bg-green-800 py-3 px-4 rounded hover:bg-green-900 transition-all"
      on:click={() => ($currentPage = "login")}>Início</button
    >
    <button
      class="bg-green-800 py-3 px-4 rounded hover:bg-green-900 transition-all"
      on:click={() => ($currentPage = "register")}
    >
      Cadastre-se
    </button>
    <button
      class="bg-green-800 py-3 px-4 rounded hover:bg-green-900 transition-all"
      on:click={() => ($currentPage = "forget")}>Esqueci a senha</button
    >
  {:else}
    <button
      class="bg-green-800 py-3 px-4 rounded hover:bg-green-900 transition-all"
      on:click={() => ($currentPage = "home")}
    >
      Home
    </button>
    <button
      class="bg-green-800 py-3 px-4 rounded hover:bg-green-900 transition-all"
      on:click={logout}
    >
      Sair
    </button>
  {/if}
</div>
