<script>
  // @ts-ignore
  import LogoIFPE from "../assets/img/Logo_IFPE.svg";
  // @ts-ignore
  import LogoIAC from "../assets/img/Logo_IAC.svg";
</script>

<div
  class="flex flex-col items-center justify-center sm:w-[450px] min-[320px]:w-screen min-[425px]:w-[350px] sm:mx-auto py-4 max-h-screen mobile:w-[350px]"
>
  <header class="flex flex-col min-[320px]:items-center">
    <div class="flex max-h-full mobile:justify-between">
      <img
        src={LogoIFPE}
        alt="Logo do instituto federal"
        class="min-[320px]:w-[125px]"
      />
      <img src={LogoIAC} alt="Logo do projeto" class="min-[320px]:w-[125px]" />
    </div>
    <div class="text-center text-white mt-4">
      <h1 class="text-xl font-bold">IFPE Access Control</h1>
      <p class="text-sm font-medium">
        Faça o login e tenha acesso as suas atividade no campus!
      </p>
    </div>
  </header>
</div>
