<script>
    import { currentPage, isLogged } from "../data-users";

    function logout() {
    fetch("http://localhost:8000/logout.php", {
      credentials: "include",
    });
    $isLogged = false;
    $currentPage = 'index';
  }
</script>
<button on:click={() => ($currentPage = "index")}>Início</button>

{#if !$isLogged}
    <button 
    on:click={() => ($currentPage = "register")}> 
    Cadastre-se
    </button>
    <button 
    on:click={() => ($currentPage = "login")}> 
    Entrar
    </button>
{:else}
    <button 
    on:click={() => ($currentPage = "home")}> 
    Home
    </button>
    <button 
    on:click={logout}> 
    Sair 
    </button>
{/if}
