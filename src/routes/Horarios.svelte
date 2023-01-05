<script>
  import { onMount } from "svelte";

  let data = "";
  let entrada = "";
  let saida = "";

  let horarios = [];

  async function load() {
    const response = await fetch("http://localhost:8000/get-registro.php", {
      credentials: "include",
    });

    if (!response.ok) {
      alert("Você não está logado!");
      return;
    }

    horarios = await response.json();
  }
  onMount(() => {
    load();
  });

  async function cadastrar() {
    const form = new FormData();
    form.append("data", data);
    form.append("entrada", entrada);
    form.append("saida", saida);
    const response = await fetch("http://localhost:8000/registro-ponto.php", {
      method: "POST",
      body: form,
      credentials: "include",
    });

    if (!response.ok) {
      alert("Algo deu errado");
      return;
    }
    data = "";
    entrada = "";
    saida = "";
    load();
  }
</script>

<h1>Meus horários</h1>

<form on:submit|preventDefault={cadastrar}>
  <input type="date" bind:value={data} />
  <input type="time" bind:value={entrada} />
  <input type="time" bind:value={saida} />
  <button type="submit">Cadastrar</button>
</form>

{#each horarios as horario}
  <div>{horario.TIP_DATA} {horario.TIP_ENTRADA} {horario.TIP_SAIDA}</div>
{/each}
