<script>
  import { currentPage, isLogged } from "./data-users";
  import Header from "./components/Header.svelte";
  import Navbar from "./routes/Navbar.svelte";
  import SignIn from "./routes/SignIn.svelte";
  import SignUp from "./routes/SignUp.svelte";
  import Forget from "./routes/Forget.svelte";
  import Dashboard from "./routes/Dashboard.svelte";
</script>

<main
  class="bg-gray-800 h-full flex flex-col justify-center items-center min-[320px]:w-screen transition-all"
>
  {#if !$isLogged == true}
    <Header />
    <Navbar />

    {#if $currentPage == "index"}
      <SignIn />
    {:else if $currentPage == "register"}
      <SignUp />
    {:else if $currentPage == "login"}
      <SignIn />
    {:else if $currentPage == "forget"}
      <Forget />
    {/if}
  {:else if $currentPage == "dashboard"}
    <Dashboard />
  {/if}
</main>
