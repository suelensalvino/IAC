<script>
    import { entrada } from "../data-users";
    let form = {
        data: '',
        entrada: '',
        saida: '',
    }

    function cadastrar() {
        $entrada = $entrada.concat({
            data: form.data,
            entrada: form.entrada,
            saida: form.saida,
        })
    }
</script>
<h1>Meus horários</h1>

<hr>
<form on:submit|preventDefault={cadastrar}>
    <input type="date" bind:value={form.data}>
    <input type="time" bind:value={form.entrada}>
    <input type="time" bind:value={form.saida}>
    <input type="submit">
</form>

{#each $entrada as dados}
    <div>{dados.data} {dados.entrada} {dados.saida}</div>
{/each}