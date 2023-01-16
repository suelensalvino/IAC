<!-- Javascript -->
<script>
  // @ts-nocheck
  import LogoIAC from "../assets/img/Logo_IAC.svg";

  import { currentPage, isLogged } from "../data-users";
  function logout() {
    fetch("http://localhost:8000/logout.php", {
      credentials: "include",
    });
    $isLogged = false;
    $currentPage = "index";
  }
</script>

<!-- HTML -->

<header
  class="absolute left-0 w-[300px] h-screen bg-slate-700 flex flex-col items-center "
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
        <a href="#">Home</a>
      </li>
      <li
        class="border-b-2 pb-2 border-green-700 text-slate-50 hover:bg-slate-500 hover:transition-all cursor-pointer px-2 pt-1 "
      >
        <a href="#">Frequências</a>
      </li>
      <li
        class="border-b-2 pb-2 border-green-700 text-slate-50 hover:bg-slate-500 hover:transition-all cursor-pointer px-2 pt-1 "
      >
        <a href="#">Calendário</a>
      </li>
      <li
        class="border-b-2 pb-2 border-green-700 text-slate-50 hover:bg-slate-500 hover:transition-all cursor-pointer px-2 pt-1 "
      >
        <a href="#">Minha conta</a>
      </li>
    </ul>

    <button
      class="bg-green-800 py-3 px-4 rounded hover:bg-green-900 transition-all text-slate-200"
      on:click={logout}
    >
      Sair
    </button>
  </div>
</header>
