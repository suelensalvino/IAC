<script>
  import Cadastro from "./Cadastro.svelte";
</script>

<main>
  <div>
      <img src="/img/logo-ifpe.png" class="logo" alt="IFPE Logo" />
  </div>
  
  <h1>IFPE Access Control</h1>
  <p>Faça login e tenha acesso as suas atividades no campus</p>

  <form class="login">
    <div class="matricula">
      <label>Insira sua matrícula</label>
      <input type="text" maxlength="14" placeholder="00000CRSIG1111">
    </div>

    <div class="senha">
      <label>Insira sua senha</label>
      <input type="password" minlength="8" maxlength="20" placeholder="*************">
    </div>

    <input class="botao-entrar" type="button" value="Entrar">

  </form>

  <div>
    <a href="">Esqueceu sua senha?</a>
  </div>

  <div>
    <a href="">Não possui conta? Cadastre-se agora!</a>
  </div>
</main>