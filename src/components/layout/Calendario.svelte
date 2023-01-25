<!-- Javascript -->
<script>
  import "dayjs/locale/pt-br";
  import { InlineCalendar, Swappable, themes } from "svelte-calendar";
  import dayjs from "dayjs";
  const theme = {
    calendar: {
      width: "100px",
      shadow: "0px 0px 5px rgba(0, 0, 0, 0.25)",
    },
  };

  let locale = "pt-br";

  $: dayjs.locale(locale);
</script>

<!-- HTML -->
<div class="flex flex-col justify-center items-center">
  <h1
    class="mb-4 font-semibold text-3xl text-white border-b-2 pb-1 border-white/20"
  >
    Calendário
  </h1>

  <Swappable value={{ locale }} vertical={false}>
    <InlineCalendar theme={themes.dark} />
  </Swappable>
</div>
