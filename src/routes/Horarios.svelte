<script>

    let data = '';
    let entrada = '';
    let saida = '';
    
    function cadastrar() {
    const form = new FormData();
    form.append("data", data);
    form.append("entrada", entrada);
    form.append("saida", saida);
    fetch("http://localhost:8000/registro-ponto.php", {
      method: "POST",
      body: form,
      credentials: "include",
    });
  }

</script>
<h1>Meus horários</h1>

<form on:submit|preventDefault={cadastrar}>
    <input type="date" bind:value={data} />
    <input type="time" bind:value={entrada} />
    <input type="time" bind:value={saida} />
    <button type="submit">Cadastrar</button>
  </form>
