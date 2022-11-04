<script>
  import SignUp from "./routes/SignUp.svelte";
  import SignIn from "./routes/SignIn.svelte";

  import LogoIFPE from "./assets/img/Logo_IFPE.svg";
  import LogoIAC from "./assets/img/Logo_IAC.svg";
  import { Link, Route, Router } from "svelte-navigator";
</script>

<Router>
  <main class="bg-gray-800">
    <div
      class="flex flex-col items-center justify-center w-[400px] h-screen mx-auto my-0"
    >
      <header class="flex flex-col">
        <div class="flex">
          <img src={LogoIFPE} alt="Logo do instituo federal" />
          <img src={LogoIAC} alt="Logo do projeto" />
        </div>
        <div class="text-center text-white mt-4">
          <h1 class="text-2xl font-bold">IFPE Access Control</h1>
          <p class="text-sm font-medium">
            Faça o login e tenha acesso as suas atividade no campus!
          </p>
        </div>
      </header>

      <Route path="/">
        <SignUp />
      </Route>
      <Route path="SignUp">
        <SignUp />
      </Route>
      <Route path="SignIn">
        <SignIn />
      </Route>
    </div>
  </main>
</Router>
