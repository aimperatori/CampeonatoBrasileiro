Objetivo : Testar a proficiência dos alunos na aplicação conhecimentos adquiridos em sala
de aula, concedendo a oportunidade de realizar uma prática supervisionada do
desenvolvimento de uma arquitetura de software.

Forma de realização: Os alunos se dividirão em duplas, que realizarão a definição da
arquitetura e a implementação de uma prova de conceito (POC) dessa arquitetura para um
sistema que será descrito abaixo. A prova de conceito deverá testar todas as camadas
definidas na arquitetura, demonstrando que a arquitetura é viável. O trabalho será dividido
em duas partes, com entregas distintas, sendo que a primeira entrega equivalerá a nota do
trabalho T1, e a segunda, a nota do trabalho T2.
Forma de Apresentação : Deverá ser entregue o documento de arquitetura de software,
devidamente preenchido, cobrindo todos os aspectos solicitados no modelo fornecido. Além
disso, deverão ser entregues o projeto do Eclipse com os códigos fontes, bem como todos
os artefatos necessários para a execução do software, tais quais scripts e arquivos de
configuração. O projeto poderá ser construído em qualquer linguagem de programação
orientada a objetos, porém o software construído como prova de conceito deverá ser
executado em um ambiente de homologação, fora da IDE. (Pacote de implantação)

O Projeto : Calculadora do Brasileirão

Será projetada nesse semestre uma arquitetura que suporte um software de
acompanhamento para campeonatos de futebol por pontos corridos, como é o caso do
campeonato brasileiro. Denominaremos esse software de “Calculadora do Brasileirão”.

O software deve permitir o cadastramento dos times e definição das rodadas. Podem
ser cadastrados um número infinito de times, mas somente 20 podem ser inscritos.
Deverão ser geradas pelo programa um número suficiente de rodadas para que todos os
times enfrentem-se pelo menos uma vez. As rodadas acontecem sempre às quartas-feiras
e aos domingos. O programa deverá calcular as datas a partir de uma data inicial fornecida
pelo usuário. O programa permitirá o cadastramento dos resultados da rodada, em uma
interface gráfica que apresente todos os jogos da rodada e permita ao usuário registrar os
resultados.
Para cada partida ganha, o vencedor leva 3 (três) pontos. Em caso de empate cada
time ganha 1(um) ponto. Perdedores não ganham nada. Para a classificação, o saldo de
gols é o critério de desempate. Terminadas todas as rodadas, o campeão deve ser
registrado na base de dados no registro do campeonato.
Por fim, o software deverá apresentar os resultados finais do campeonato, bem como
estatísticas sobre o melhor ataque e a defesa menos vazada, assim como o pior ataque e
defesa do campeonato.
A arquitetura:
O aplicativo deverá ser projetado de forma a permitir ao menos dois mecanismos de
persistência distintos das informações: Em banco de dados (relacional ou NoSQL) e em
arquivos. Da mesma forma, deverá ser possível manipular o software através de mais do
que uma interface de usuário, sendo obrigatório o desenvolvimento de uma interface
gráfica e uma em modo caracter (CLI : Command Line Interface). Deverão haver interfaces
suficientes para a visualização de todas as informações presentes no sistema
 
 Datas de Entrega :

Parte 1 : 29/10/2019 (Trabalho T1)
Deverá ser entregue o documento de arquitetura, devidamente preenchido, com
observações explicando os motivos das decisões tomadas (Design Rationale)

Parte 2 : 03/12/2019 (Trabalho T2)

Na segunda entrega, deverá ser implementado um ou mais casos de uso, que serão de
escolha do professor, para provar o funcionamento da arquitetura projetada. Essa
implementação servirá como prova de conceito da arquitetura, e deve ser entregue
construída e funcionando. Além da POC, deverá ser entregue o documento de arquitetura,
revisado e atualizado após a primeira entrega.

Critérios de Avaliação : Será realizada apresentação em sala de aula de cada trabalho,
pela respectiva dupla, para o professor, nessa apresentação os componentes da dupla
terão que explicar como modelaram e implementaram partes da arquitetura e da
aplicação, conforme questionamentos do mesmo.
Serão avaliados:
 O documento de arquitetura, com seus diagramas
 A arquitetura proposta e sua correta organização
 A correção do código
 O funcionamento da prova de conceito
Bom Trabalho.