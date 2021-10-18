<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reports</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="container">
        <h4 class="text-center" style="margin-top: 150px">RELATÓRIO DE AVALIAÇÃO PSICOLÓGICA</h4>
        <table class="table" style="border: none;margin-top: 20px; margin-left: 50px; margin-right: 70px; table-layout:fixed">
            <thead>
                <tr>
                    <td style="padding-top: unset; padding-bottom: unset;font-size: 14px; font-weight: 700; border: unset; width:80%">{{ "Nome: "  }}</td>
                    {{-- . $patient['nome'] --}}
                </tr>
                <tr>
                    <td style="padding-top: unset; padding-bottom: unset;font-size: 14px; font-weight: 700; border: unset">{{ "Idade: " }}</td>
                    {{-- . $patient['idade']  --}}
                </tr>
                <tr>
                    <td style="padding-top: unset; padding-bottom: unset;font-size: 14px; font-weight: 700; border: unset">{{ "Data de Nascimento: " }}</td>
                    {{--. $patient['data_nascimento'] --}}
                </tr>
                <tr>
                    <td style="padding-top: unset; padding-bottom: unset;font-size: 14px; font-weight: 700; border: unset">{{ "Data da Avaliação: pegar data da ultima sessao"}}</td>
                </tr>
                <tr>
                    <td style="padding-top: unset; padding-bottom: unset;font-size: 14px; font-weight: 700; border: unset">{{ "Escolaridade: " }}</td>
                    {{-- . $patient['escolaridade'] --}}
                </tr>
                <tr>
                    <td style="padding-top: unset; padding-bottom: unset;font-size: 14px; font-weight: 700; border: unset">{{ "Avaliador(a): " }}</td>
                    {{-- . $patient['usuario']  --}}
                </tr>
                <tr class="">
                    <td style="font-size: 12px; border: unset; width:90%"><p>{{ "Obs: Os resultados descritos abaixo são válidos para o presente momento, uma vez que mudanças neurofisiológicas e ambientais podem alterá-los ao longo do tempo." }}</p></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="font-weight: 700; border: unset">{{ "1 - ANTECEDENTES" }}</td>
                </tr>
                <tr>
                    <td style="border: unset"><p>{{ "Queixa Inicial: pegar o texto do anotações/conclusoes da primeira sessao" }}</p></td>
                </tr>
                <tr>
                    <td style="border: unset"><p>{{ "Histórico Familiar: pegar o texto do anotações/conclusoes da primeira sessao" }}</p></td>
                </tr>
                <tr>
                    <td style="border: unset"><p>{{ "Desenvolvimento: pegar o texto do anotações/conclusoes da primeira sessao" }}</p></td>
                </tr>
                <tr>
                    <td style="font-weight: 700; border: unset">{{ "2 - ATITUDE EM TAREFA" }}</td>
                </tr>
                <tr>
                    <td style="border: unset"><p>{{ "não tem subtópico, texto direto" }}</p></td>
                </tr>
                <tr>
                    <td style="font-weight: 700; border: unset">{{ "3 - RESULTADOS DA AVALIAÇÃO" }}</td>
                </tr>
                <tr>
                    <td style="font-weight: 700; border: unset">{{ "4 - CONCLUSÃO" }}</td>
                </tr>
            </tbody>
        </table>

    </div>

    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>

</html>