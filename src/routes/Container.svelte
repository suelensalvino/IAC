<script>
    // @ts-nocheck
    import SignUp from "./SignUp.svelte";
    import SignIn from "./SignIn.svelte";
    import Forget from './Forget.svelte'
    import LogoIFPE from "../assets/img/Logo_IFPE.svg";
    import LogoIAC from "../assets/img/Logo_IAC.svg";

    import { Route, Router } from "svelte-navigator";
</script>

<div
    class="flex flex-col items-center justify-center w-[450px] mx-auto py-4 max-h-screen"
>
    <header class="flex flex-col">
        <div class="flex max-h-full">
            <img src={LogoIFPE} alt="Logo do instituto federal" />
            <img src={LogoIAC} alt="Logo do projeto" />
        </div>
        <div class="text-center text-white mt-4">
            <h1 class="text-2xl font-bold">IFPE Access Control</h1>
            <p class="text-sm font-medium">
                Faça o login e tenha acesso as suas atividade no campus!
            </p>
        </div>
    </header>
    <Router>
        <Route path="/">
            <SignIn />
        </Route>
        <Route path="SignIn">
            <SignIn />
        </Route>
        <Route path="SignUp">
            <SignUp />
        </Route>
        <Route path="Forget">
            <Forget/>
        </Route>
    </Router>
</div>
