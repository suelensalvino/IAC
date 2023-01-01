<script>
    import { currentPage, isLogged } from "./data-users";

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
{/if}