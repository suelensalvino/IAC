<!-- Javascript -->
<script>
  // @ts-nocheck
  import LogoIAC from "../assets/img/Logo_IAC.svg";
  import Account from "../components/layout/Account.svelte";
  import Calendario from "../components/layout/Calendario.svelte";
  import Frequencia from "../components/layout/Frequencia.svelte";
  import Home from "../components/layout/Home.svelte";

  import { currentPage, isLogged, dashPage, dashPages } from "../data-users";
  function logout() {
    fetch("http://localhost:8000/logout.php", {
      credentials: "include",
    });
    $isLogged = false;
    $currentPage = "index";
  }

  let abrindoMenu = false;

  function toggle() {
    abrindoMenu = !abrindoMenu;
  }
</script>

<!-- HTML -->

<header
  class={`${
    abrindoMenu ? "flex" : "hidden"
  } min-[764px]:absolute min-[320px]:fixed min-[320px]:w-screen min-[1024px]:flex min-[1024px]:w-[300px] left-0 w-[25%] h-screen bg-slate-700 flex-col items-center z-10`}
>
  <div
    class="flex flex-col items-center mt-8 mb-12 border-b-2 border-slate-600 w-[90%] pb-4"
  >
    <h1 class="font-semibold text-3xl text-green-500 mb-4">IAC - IFPE</h1>
    <img src={LogoIAC} alt="Logo-IAC" class="w-28" />
  </div>
  <div class="flex flex-col items-center justify-center">
    <ul class="flex flex-col gap-4 text-lg font-medium text-center mb-12">
      <li
        class="border-b-2 pb-2 border-green-700 text-slate-50 hover:bg-slate-500 hover:transition-all cursor-pointer px-5 pt-1 "
      >
        <!-- svelte-ignore a11y-click-events-have-key-events -->
        <p id="homeDash" on:click={() => dashPage("home")} on:click={toggle}>
          Inicio
        </p>
      </li>
      <li
        class="border-b-2 pb-2 border-green-700 text-slate-50 hover:bg-slate-500 hover:transition-all cursor-pointer px-2 pt-1 "
      >
        <!-- svelte-ignore a11y-click-events-have-key-events -->
        <p
          id="frequencia"
          on:click={() => dashPage("frequencia")}
          on:click={toggle}
        >
          Frequências
        </p>
      </li>
      <li
        class="border-b-2 pb-2 border-green-700 text-slate-50 hover:bg-slate-500 hover:transition-all cursor-pointer px-2 pt-1 "
      >
        <!-- svelte-ignore a11y-click-events-have-key-events -->
        <p
          id="calendario"
          on:click={() => dashPage("calendario")}
          on:click={toggle}
        >
          Calendário
        </p>
      </li>
      <li
        class="border-b-2 pb-2 border-green-700 text-slate-50 hover:bg-slate-500 hover:transition-all cursor-pointer px-2 pt-1 "
      >
        <!-- svelte-ignore a11y-click-events-have-key-events -->
        <p id="conta" on:click={() => dashPage("conta")} on:click={toggle}>
          Minha conta
        </p>
      </li>
    </ul>

    <button
      class="bg-green-800 py-3 px-4 rounded hover:bg-green-900 transition-all text-slate-200"
      on:click={logout}
    >
      Sair da conta
    </button>
    <!-- svelte-ignore a11y-click-events-have-key-events -->
    <div
      class="fixed top-[20px] left-[30px] min-[1024px]:hidden cursor-pointer"
      on:click={toggle}
    >
      <img
        src="https://icongr.am/material/close.svg?size=32&color=ffffff"
        alt="Fechar menu"
      />
    </div>
  </div>
</header>
<!-- svelte-ignore a11y-click-events-have-key-events -->
<div
  class="fixed top-[20px] left-[30px] z-[5] min-[1024px]:hidden cursor-pointer"
  on:click={toggle}
>
  <img
    src="https://icongr.am/material/menu.svg?size=32&color=ffffff"
    alt="Abrir Menu"
  />
</div>
<section
  class="absolute min-[1024px]:w-[75%] min-[320px]:w-screen min-[1024px]:ml-[35%] min-[320px]:ml-0 min-[1024px]:mr-[10%] min-[320px]:mr-0] min-[1024px]:px-12 min-[1024px]:py-8 min-[320px]:px-4 min-[320px]:py-2 h-screen"
>
  <div
    class="w-full bg-slate-700 h-full rounded-lg min-[1024px]:p-8 flex justify-center items-center flex-col min-[320px]:px-2"
  >
    {#if $dashPages == "home"}
      <Home />
    {:else if $dashPages == "frequencia"}
      <Frequencia />
    {:else if $dashPages == "calendario"}
      <Calendario />
    {:else if $dashPages == "conta"}
      <Account />
    {/if}
  </div>
</section>
