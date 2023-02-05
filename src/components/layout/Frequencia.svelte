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

<h1
  class="mb-4 font-semibold text-2xl text-white border-b-2 pb-1 border-white/20"
>
  Frequência
</h1>
<div class="flex w-full flex-col overflow-y-scroll px-4">
  <div
    class="w-full flex text-center bg-slate-500 text-white font-medium text-lg border-b-2 border-black/50  rounded-lg"
  >
    <div class="w-full">Data</div>
    <div class="w-full border-x-2 border-black/50">Entrada</div>
    <div class=" w-full">Saída</div>
  </div>
  {#each horarios as horario}
    <div
      class="w-full flex odd:bg-slate-200 even:bg-slate-300 border-b-2 border-black/50 text-center rounded-lg font-medium hover:bg-slate-300/80  transition-all"
    >
      <div class="w-full">{horario.TIP_DATA}</div>
      <div class="w-full border-x-2 border-black/50">
        {horario.TIP_ENTRADA}
      </div>
      <div class="w-full">{horario.TIP_SAIDA}</div>
    </div>
  {/each}
</div>
<a
  class="mb-4 py-2 px-4 mt-4 bg-green-800 hover:bg-green-700 transition-all rounded  text-1xl text-white pb-1 border-white/50"
  href="http://localhost:8000/generate-pdf.php"
  >Gerar PDF
</a>
