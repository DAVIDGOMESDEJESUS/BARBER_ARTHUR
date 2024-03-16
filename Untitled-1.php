<?php
$host = "seu_host";
$usuario = "seu_usuario";
$senha = "sua_senha";
$banco = "seu_banco";

$conexao = mysqli_connect($host, $usuario, $senha, $banco);

if (!$conexao) {
  die("Falha na conexão: " . mysqli_connect_error());
}
?>
<?php
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Inclui o arquivo de conexão com o banco de dados
  require_once "conexao.php";

  // Obtém os valores enviados pelo formulário
  $nome = $_POST["nome"];
  $data = $_POST["data"];
  $hora = $_POST["hora"];

  // Prepara e executa a consulta SQL para inserir os dados na tabela
  $sql = "INSERT INTO agendamentos (nome, data, hora) VALUES ('$nome', '$data', '$hora')";
  if (mysqli_query($conexao, $sql)) {
    echo "Agendamento realizado com sucesso!";
  } else {
    echo "Erro ao agendar: " . mysqli_error($conexao);
  }

  // Fecha a conexão com o banco de dados
  mysqli_close($conexao);
}
?>
