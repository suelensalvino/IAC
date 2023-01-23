<!-- Javascript -->
<script>
  import { dark } from "svelte-calendar/config/theme";
  import { InlineCalendar } from "svelte-calendar";
  const theme = {
    calendar: {
      width: "100px",
      shadow: "0px 0px 5px rgba(0, 0, 0, 0.25)",
    },
  };
</script>

<!-- HTML -->
<div class="flex flex-col justify-center items-center">
  <h1 class="mb-4 font-semibold text-2xl text-white border-b-2 pb-1 border-white/20">Calendario</h1>

  <InlineCalendar theme={dark} />
</div>
