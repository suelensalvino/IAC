<script>
  // @ts-nocheck

  import Button from "./Button.svelte";
  import axios from "axios";
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
    let form = new FormData();
    form.append("data", data);
    form.append("entrada", entrada);
    form.append("saida", saida);

    const urlValidation =
      "http://localhost:8000/validation-create-registro.php";
    const urlCreate = "http://localhost:8000/create-registro-ponto.php";

    axios.defaults.withCredentials = true;

    axios.get(urlValidation).then((response) => {
      const validacaoHorario = response.data;

      const filtrandoHorario = validacaoHorario.map((validando) => {
        return validando.TIP_DATA;
      });
      let filtrandoHorarioEspecifico = filtrandoHorario.find(
        (element) => element === data
      );

      if (filtrandoHorarioEspecifico === data) {
        alert("Horario já cadastrado! \n Verifique sua aba de frequência!");
      } else {
        fetch(urlCreate, {
          method: "POST",
          body: form,
          credentials: "include",
        });
        data = "";
        entrada = "";
        saida = "";

        alert("Adicionado com sucesso!");
      }
    });
  }
</script>

<form on:submit|preventDefault={cadastrar} class="flex flex-col gap-4">
  <div
    class="flex flex-col justify-center items-center mx-auto min-[769px]:w-[500px] min-[320px]:w-full gap-4 "
  >
    <label class="text-slate-300 font-medium text-xl flex flex-col w-full gap-2"
      >Data de presença
      <input
        type="date"
        bind:value={data}
        id="data"
        max={dataCompletaMax}
        min={dataCompletaMin}
        class="p-1 bg-slate-300 rounded focus:outline-green-800 hover:bg-slate-500 transition-all text-slate-600"
        required
      />
    </label>
    <label class="text-slate-300 font-medium text-xl flex flex-col w-full gap-2"
      >Horário de entrada
      <input
        type="time"
        bind:value={entrada}
        class="p-1 bg-slate-300 rounded focus:outline-green-800 hover:bg-slate-500 transition-all text-slate-600"
        required
      />
    </label>
    <label
      class="text-slate-300 font-medium text-xl flex flex-col w-full gap-2 mb-8"
      >Horário de saída
      <input
        type="time"
        bind:value={saida}
        class="p-1 bg-slate-300  rounded focus:outline-green-800 hover:bg-slate-500 transition-all text-slate-600"
        required
      />
    </label>
    <Button><span slot="button-child">Inserir horário</span></Button>
  </div>
</form>
