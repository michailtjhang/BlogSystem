<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $survey->title }}</title>
    <script src="https://unpkg.com/survey-jquery"></script>
    <link href="https://unpkg.com/survey-core/defaultV2.css" rel="stylesheet">
</head>
<body>
    <h1>{{ $survey->title }}</h1>

    <div id="survey-container"></div>

    <script>
        const surveyJSON = {!! $survey->survey_json !!};

        const survey = new Survey.Model(surveyJSON);
        survey.onComplete.add((sender) => {
            // Aksi setelah survey selesai diisi
            console.log('Survey Result: ', sender.data);
        });

        survey.render('survey-container');
    </script>
</body>
</html>
