<script>
  // @ts-nocheck

  import Button from "./Button.svelte";
  let data = "";
  let entrada = "";
  let saida = "";

  const ano = new Date().getFullYear();
  const mes = "0" + (new Date().getMonth() + 1);
  const dia = new Date().getDate();
  const diaMin = new Date().getDate() - 7;

  let dataCompletaMax = [];
  dataCompletaMax.push(ano, mes, dia);
  let dataCompletaMin = [];
  dataCompletaMin.push(ano, mes, diaMin);

  function correcaoData() {
    dataCompletaMax = dataCompletaMax.toString().replace(/,/g, "-");
    dataCompletaMin = dataCompletaMin.toString().replace(/,/g, "-");
    return dataCompletaMax, dataCompletaMin;
  }
  correcaoData();

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
  }
</script>

<form on:submit|preventDefault={cadastrar} class="flex flex-col gap-4">
  <div
    class="flex flex-col justify-center items-center mx-auto w-[500px] gap-4 "
  >
    <label class="text-slate-300 font-medium text-xl"
      >Data de presença:
      <input
        type="date"
        bind:value={data}
        id="data"
        max={dataCompletaMax}
        min={dataCompletaMin}
        class="p-1 bg-slate-300 rounded focus:outline-green-800 hover:bg-slate-500 transition-all text-slate-600"
      />
    </label>
    <label class="text-slate-300 font-medium text-xl"
      >Horário de entrada:
      <input
        type="time"
        bind:value={entrada}
        class="p-1 bg-slate-300 rounded focus:outline-green-800 hover:bg-slate-500 transition-all text-slate-600"
      />
    </label>
    <label class="text-slate-300 font-medium text-xl mb-8"
      >Horário de saída:
      <input
        type="time"
        bind:value={saida}
        class="p-1 bg-slate-300  rounded focus:outline-green-800 hover:bg-slate-500 transition-all text-slate-600"
      />
    </label>
    <Button><span slot="button-child">Inserir horário</span></Button>
  </div>
</form>


