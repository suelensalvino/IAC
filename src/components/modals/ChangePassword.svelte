<!-- Javascript -->
<script>
  import { createEventDispatcher, onDestroy } from "svelte";
  import Button from "../Button.svelte";
  // @ts-ignore
  import LogoIAC from "../../assets/img/Logo_IAC.svg";

  const dispatch = createEventDispatcher();
  const close = () => dispatch("close");

  let senha = "";
  let confSenha = "";
  let modal;

  const handle_keydown = (e) => {
    if (e.key === "Escape") {
      close();
      return;
    }

    if (e.key === "Tab") {
      // trap focus
      const nodes = modal.querySelectorAll("*");
      const tabbable = Array.from(nodes).filter((n) => n.tabIndex >= 0);

      let index = tabbable.indexOf(document.activeElement);
      if (index === -1 && e.shiftKey) index = 0;

      index += tabbable.length + (e.shiftKey ? -1 : 1);
      index %= tabbable.length;

      tabbable[index].focus();
      e.preventDefault();
    }
  };

  const previously_focused =
    typeof document !== "undefined" && document.activeElement;

  if (previously_focused) {
    onDestroy(() => {
      // @ts-ignore
      previously_focused.focus();
    });
  }

  async function alterarSenha() {
    if (senha != confSenha) return;
    let form = new FormData();
    
    form.append("senha", senha);

    const url = "http://localhost:8000/update-password-user.php";

    if (senha.length < 8) {
      alert("Insira a senha no padrão correto");
    } else {
      const response = await fetch(url, {
        method: "POST",
        body: form,
        credentials: "include",
      });
      alert("Senha alterada com sucesso!");
      close();
    }
  }
</script>

<!-- HTML -->

<svelte:window on:keydown={handle_keydown} />

<!-- svelte-ignore a11y-click-events-have-key-events -->
<div
  class="fixed top-0 left-0 w-full h-full bg-black/30"
  id="modal"
  on:click={close}
/>

<div
  class="absolute left-1/2 top-1/2 w-[100vw - 4em] max-w-lg m-h-[100vh - 4em] h-[600px] w-[500px] overflow-auto transform-cpu rounded-lg -translate-x-1/2 -translate-y-1/2 p-1 bg-white"
  role="dialog"
  aria-modal="true"
  bind:this={modal}
>
  <form
    on:submit|preventDefault={alterarSenha}
    class="flex flex-col p-4 justify-center items-center h-full gap-6 max-w-[250px] mx-auto"
  >
    <img src={LogoIAC} alt="Logo IAC" class="w-32 -mb-4" />
    <label for="" class="text-black text-lg flex flex-col text-center">
      Insira sua nova senha
      <input
        type="password"
        class="rounded-lg p-2 text-black ring-2 ring-green-600 focus:ring-green-900 focus:ring-2 focus:outline-none"
        minlength="8"
        maxlength="21"
        placeholder="*************"
        bind:value={senha}
      />
    </label>
    <label for="" class="text-black text-lg flex flex-col text-center">
      Repita sua nova senha
      <input
        type="password"
        class="rounded-lg p-2 text-black ring-2 ring-green-600 focus:ring-green-900 focus:ring-2 focus:outline-none"
        minlength="8"
        maxlength="21"
        placeholder="*************"
        bind:value={confSenha}
      />
    </label>
    {#if senha != "" && senha != confSenha}
      <div class="danger">Senhas não conferem</div>
    {/if}
    <Button><span slot="button-child">Alterar senha</span></Button>
  </form>
  <!-- svelte-ignore a11y-click-events-have-key-events -->
  <span
    class="absolute top-1 right-1 mr-2 mt-2 cursor-pointer bg-green-700 hover:bg-green-900 transition-all"
    id="fechar"
    on:click={close}
    ><img
      src="https://icongr.am/material/close.svg?size=32&color=ffffff"
      alt="Fechar modal"
    /></span
  >
</div>
