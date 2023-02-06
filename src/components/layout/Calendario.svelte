<!-- Javascript -->
<script>
  import "dayjs/locale/pt-br";
  import { InlineCalendar, Swappable } from "svelte-calendar";
  import dayjs from "dayjs";
  const theme = {
    calendar: {
      minWidth: "300px",
      width: "80vh",
      height: "100%",
      maxWidth: "80vw",
      legend: {
        height: "45px",
      },
      shadow: "0px 10px 26px rgba(0, 0, 0, 0.25)",
      colors: {
        text: {
          primary: "#eee",
          highlight: "#fff",
        },
        background: {
          primary: "#333",
          highlight: "green",
          hover: "#222",
        },
        border: "#222",
      },
      font: {
        regular: "1.5em",
        large: "37em",
      },
      grid: {
        disabledOpacity: ".5",
        outsiderOpacity: ".7",
      },
    },
  };

  let locale = "pt-br";

  $: dayjs.locale(locale);
</script>

<!-- HTML -->
<div class="flex flex-col justify-center items-center w-full">
  <h1
    class="mb-4 font-semibold text-3xl text-white border-b-2 pb-1 border-white/20"
  >
    Calendário
  </h1>

  <Swappable value={{ locale }} vertical={false}>
    <InlineCalendar {theme} />
  </Swappable>
</div>
