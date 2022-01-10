# Bibliotecav

Banco de dados:

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Jan-2022 às 01:19
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto3`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `autor` varchar(200) NOT NULL,
  `nicho` varchar(200) NOT NULL,
  `sit` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `datealuguel` date NOT NULL,
  `descricao` varchar(5000) NOT NULL,
  `imagem` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`id`, `nome`, `autor`, `nicho`, `sit`, `user`, `datealuguel`, `descricao`, `imagem`) VALUES
(5, 'As vidas dos santos', 'Leigh Bardugo', 'Romance', 0, 1, '2022-01-09', 'Embarque em uma viagem para o Grishaverso com essa réplica ilustrada de As vidas dos santos, o Istorii Sankt\'ya, que já foi mencionado diversas vezes nos livros da série.  Das mãos de Alina Starkov para as suas, As vidas dos santos é um livro mágico do Grishaverso, que contém a história dos santos que permeiam o a cultura do universo extraordinário criado por Bardugo.   Esses contos incluem os milagres e martírios de Santos mais conhecidos como Sankta Lizabeta das Rosas e Sankt Ilya Acorrentado, até as histórias obscuras de Sankta Ursula, Sankta Maradi e o Santo sem Estrelas.   Como foi visto na série original da Netflix Sombra e Ossos, esta coleção inclui ilustrações exuberantes feitas exclusivamente para cada uma das histórias.  ', '61d625b6139ec.jpg'),
(6, 'O beco das ilusões perdidas', 'William Lindsay Gresham', 'Romance', 0, 1, '2022-01-09', 'O jovem Stan Carlisle, carroceiro de um circo de variedades, assiste, em um misto de repulsa e curiosidade, a uma das principais atrações do lugar: um alcoólatra, decadente e entregue à própria imundice, é apresentado como um selvagem, sendo objeto de espanto, nojo e escárnio da multidão voyeurística. Stan se pergunta como um homem pode se humilhar e perder a dignidade daquela forma. Ele jura que nunca, de forma alguma, essa desgraça poderia acontecer com ele.  Stan é inteligente e ambicioso – e não sem um traço útil de crueldade –, e em breve sobe na hierarquia do circo. No palco, vira assistente no espetáculo de leitura de mentes e adivinhação, e em pouco tempo se “gradua” como um espiritualista.  Aproveitando-se de suas novas habilidades, sai do circo e passa a atender ricos e crédulos em suas belas casas. O mundo parece estar à disposição de Stan. Mas seu caminho cruzará com o de uma perigosa psiquiatra, e nem tudo sairá como planejado: as ambições do jovem Stan cobrarão seu preço.', '61d73da727c88.jpg'),
(8, 'O paciente', 'Jasper DeWitt', 'Romance', 0, 1, '2022-01-09', 'Em uma série de postagens na internet, o jovem – e extremamente autoconfiante – psiquiatra Parker H. conta suas experiências como médico residente em um sombrio manicômio de New England.  Nesse hospital, Parker assume a tarefa de tratar um misterioso paciente. Trata-se do mais antigo caso do lugar: Joe, um homem considerado de grande risco, internado na instituição desde que tinha apenas seis anos de idade. Não há diagnóstico preciso para sua enfermidade, mas o quadro parece piorar dia a dia.  Entre o medo e o desespero, aparentemente convencidas de que Joe poderia representar uma ameaça ao mundo exterior, as autoridades do hospital o mantêm estritamente isolado, confinado e com o mínimo de contato humano possível. Aqueles que já tentaram curar o paciente – ou mesmo se aproximar dele – acabaram se entregando à loucura... ou ao suicídio.  O jovem médico calcula mal os riscos dessa relação, que se mostrará muito mais perigosa do que ele antecipava. Parker pensa ter a solução para o caso, e de fato consegue ir mais longe que qualquer outro profissional antes dele.  Mas a que preço?', '61d626a01becd.jpg'),
(9, 'Tudo o que você precisa saber sobre a psicanálise', 'Silvia Ons', 'Psicologia', 1, 0, '2022-01-05', '“Impossível reunir em um livro tudo o que precisamos saber sobre psicanálise”. É esse o alerta que a psicanalista Silvia Ons faz ao leitor no prólogo deste livro. E não sem motivo. Tamanha é a complexidade do tema que nem uma centena de livros dariam conta do “tudo”, mesmo porque, defende a autora, “tudo” não combina com a psicanálise. Lacan, cita ela, dizia que o analista deveria reinventar a psicanálise todos os dias.  Mas isso não impediu a autora de reunir, neste volume, um compêndio bastante abrangente dos principais conceitos psicanalíticos, apresentados com grande clareza e síntese e contextualizados na história.  Entenda como se desenvolveu a psicanálise, pelas mãos de Freud, como se lapidaram os conceitos do insconsciente, transferência e pulsão, como podem ser entendidas as diferentes classes de neuroses, a psicose e a paranoia. Ons dedica capítulos especiais a temas ligados à sexualidade, detalhando, por exemplo, como Freud mudou a maneira de encarar a homossexualidade, e esmiuçando os notáveis complexos de Édipo e de castração.  Com quadros explicativos, glossário e bibliografia, este livro expõe com clareza e rigor os conceitos essenciais de um saber que é fundamental para o desenvolvimento humano.', '61d6270273658.jpg'),
(10, 'História bizarra da psicologia', 'Raquel Sodré', 'Psicologia', 1, 0, '2022-01-05', 'Há séculos, o funcionamento da mente humana é motivo de grande curiosidade. Estudos, experimentos e tratamentos – dos mais simples aos mais bizarros – têm sido desenvolvidos sobre todas as esferas da psique.  Na Idade Média, por exemplo, era comum pensar que pessoas com transtornos psíquicos tinham “o diabo no corpo”, e tratamentos como sangrias e acorrentamentos se tornaram habituais. Já as instituições psiquiátricas do século XVIII mais pareciam zoológicos, e a técnica da lobotomia virou “moda” entre os médicos nos séculos XIX e XX.  Ao revelar casos absurdos, misteriosos e até engraçados da psicologia e seus pensadores, História bizarra da psicologia apresenta ao leitor tudo o que de mais improvável vem sendo feito desde que a humanidade começou a buscar explicações para o funcionamento da mente, provando que o legado dessa ciência vai muito além dos estudos realizados por Freud e seus sucessores e está repleto de bizarrices.', '61d6273402008.jpg'),
(11, 'Novas formas de amar', 'Regina Navarro Lins', 'Psicologia', 1, 0, '2022-01-05', 'Todo mundo quer amar alguém – ou alguéns. Ama-se o amor, canta-se o amor, vive-se em busca do amor. Mas amar exige muito aprendizado e este é o maior desafio dos casais. Nos tempos atuais, os desafios são ainda maiores porque surgiram novas formas de amar – e é sobre isso que a psicanalista Regina Navarro Lins discorre neste livro. Depois da revolução sexual, do divórcio, da pílula, do movimento LGBTI e de tantas outras mudanças de costume, amar virou um verbo plural. A ideia de que todo mundo tem uma alma gêmea, que um dia irá encontrar a pessoa certa era a base do amor romântico. Mas este tipo de amor vem sendo substituído pelo desejo. E o desejo é capaz de produzir um sem-número de formas de amar e de fazer sexo. Com o fim da exclusividade, ama-se a dois, a três; ama-se aos 20, aos 60 e aos 80 anos; ama-se pessoas de outro sexo ou do mesmo sexo. A monogamia, o sentimento de posse deu lugar à liberdade para experimentar o novo. Mesmo em sociedades mais conservadoras, o “padrão de comportamento aceito” vem cedendo espaço para o diferente. Surgiram o poliamor, as relações livres, o transexual. Na era da internet, busca-se o amor através do celular. As festas, os bares, mesmo os encontros armados por amigos perderam espaço para os aplicativos. O Tinder, o Happn, o Wechat e muitos outros ajudam as pessoas a se encontrarem baseados nos seus interesses, perfil etc. Mas será que está ficando cada vez mais fácil amar? Com a experiência de quem atende em consultório há cerca de 45 anos, Regina tem muito sobre o que falar. Consultora do programa Amor & Sexo, da TV Globo, colunista do programa Em Pauta, da Globo News, e com um blog no UOL, ela discute nesse livro todas essas novas formas de amar. Relata inúmeros casos reais, faz reflexões importantes e até apresenta o que há de mais novo nessa procura pelo prazer – como, por exemplo, a massagem tântrica.', '61d6277dd0e86.jpg'),
(12, 'O grande livro do bebê', 'Thatiane Mahet', 'Infantil', 1, 0, '2022-01-05', 'Todos os pais compartilham um mesmo sentimento: ansiedade. Impossível não passar noites imaginando a carinha do filho, se ele vai nascer saudável e como cuidar e educar. Para amenizar os medos e indicar caminhos, nada melhor que um livro de cabeceira. Esta é a proposta de O grande livro do bebê, da pediatra carioca Thatiane Mahet. Ela foi uma das coordenadoras da revisão e atualização do clássico deste tema no século passado: A vida do bebê, do falecido Rinaldo de Lamare. A partir desta experiência, Thatiane fez a sua própria “bíblia” abordando absolutamente tudo: das mudanças no corpo da mãe durante a gravidez à descoberta do sexo do filho; das fases do desenvolvimento do bebê aos primeiros cuidados com o recém-nascido. Assídua de congressos internacionais, Thatiane apresenta as últimas novidades em vacinas e tratamentos e desmitifica crenças e mitos. Ricamente ilustrado com fotos e gráficos, o livro traz um bê-á-bá mensal para acompanhar os dois primeiros anos de vida e uma série de perguntas e respostas com as dúvidas mais comuns dos pais.', '61d627fee87d9.jpg'),
(13, 'Lisbela e o Prisioneiro - 3ª Edição', 'Osman Lins', 'Infantil', 1, 0, '2022-01-05', 'Original de 1964, o livro que inspirou o filme de Guel Arraes é uma comédia com referências nordestinas. A fidelidade de Osman Lins à busca de uma expressão própria na ficção, decorrente de uma recusa à cômoda retomada do já conquistado e de uma fé inabalável no poder criador da palavra, foi reconhecida e admirada pela crítica brasileira e estrangeira, com raras exceções. No entanto, ele é um autor ainda pouco difundido. Por isso é oportuna esta publicação de Lisbela e o Prisioneiro. Esta obra permite ao público entrar em contato com o texto, no registro dramático, de um autor meticuloso no uso da palavra e na arquitetura da peça. Lisbela e o Prisioneiro foi sua primeira peça a ser encenada com sucesso. E com certeza, é a que até hoje teve mais alcance de público. Se muito da fama de uma peça deve ser creditado ao trabalho de direção, ao desempenho dos atores, à cenografia, ao figurino, à iluminação, ao som; outro tanto pelo menos também deve ser atribuído ao texto do dramaturgo.', '61d628315317c.jpg'),
(14, 'Francisco, nosso Papa', 'Sandra Donin', 'Infantil', 1, 0, '2022-01-05', 'Há palavras que podem mudar o mundo, sabia? Palavras que, como vaga-lumes, levam sua luz por onde voam. Este livro reúne uma seleção dos valores que nosso Papa Francisco busca transmitir em suas mensagens e gestos. Aqui você encontrará o que signifcam esses valores, o que o Papa nos diz sobre eles e algumas ideias para começar a praticá-los. As palavras de Francisco percorrem o livro desenhando o sonho de Deus para seu povo: o sonho de que todos, juntos, semearemos uma nova terra.', '61d62876d255e.jpg'),
(15, 'Laila, a garota-detetive - O caso da Seita das Set', 'Inés Stanisiere', 'Infantil', 1, 0, '2022-01-05', 'Autora best-seller e premiada de infanto-juvenis, Inês Stanisiere traz mais uma empolgante história para seus jovens leitores em Laila, a garota-detetive.  Laila, a garota-detetive mais jovem do mundo, já solucionou mais de 45 casos e tem seu próprio Laboratório de Investigações. Agora, a menina vai se deparar com um misterioso episódio envolvendo um garoto mega-esquisito, sua melhor amiga e uma seita maligna mortal.', '61d629cb3b832.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagens`
--

CREATE TABLE `mensagens` (
  `id` int(11) NOT NULL,
  `remetente` int(11) NOT NULL,
  `destinatario` int(11) NOT NULL,
  `mensagem` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `login` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `tipo` int(11) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `multa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `email`, `login`, `senha`, `tipo`, `foto`, `multa`) VALUES
(1, 'Guilherme Gomes', 'a@a', 'login', '202cb962ac59075b964b07152d234b70', 0, '61d64af8487db.jpg', 0),
(3, 'Guilherme Admin', 'd@d', 'login1', '202cb962ac59075b964b07152d234b70', 1, '61d9a0a037b0e.jpg', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `mensagens`
--
ALTER TABLE `mensagens`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
