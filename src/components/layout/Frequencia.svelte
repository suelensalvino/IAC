<!-- Javascript -->
<script>
    import { onMount } from "svelte";
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

</script>

<!-- HTML -->
<h1 class="mb-4 font-semibold text-2xl text-white border-b-2 pb-1 border-white/20">Frequência</h1>

{#each horarios as horario}
  <div>{horario.TIP_DATA} {horario.TIP_ENTRADA} {horario.TIP_SAIDA}</div>
{/each}