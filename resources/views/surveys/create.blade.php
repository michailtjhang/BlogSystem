<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Survey</title>
    <script src="https://unpkg.com/survey-creator"></script>
    <link href="https://unpkg.com/survey-creator@1.8.55/survey-creator.css" rel="stylesheet">
</head>
<body>
    <h1>Create New Survey</h1>

    <form method="POST" action="{{ route('surveys.store') }}">
        @csrf
        <input type="hidden" id="survey_json" name="survey_json">
        <input type="text" name="title" placeholder="Survey Title" required>
        <button type="submit">Save Survey</button>
    </form>

    <div id="survey-creator-container"></div>

    <script>
        const creator = new SurveyCreator.SurveyCreator('survey-creator-container');
        creator.showJSONEditor = false;

        creator.saveSurveyFunc = function (saveNo, callback) {
            const surveyJSON = JSON.stringify(creator.text);
            document.getElementById('survey_json').value = surveyJSON;
            callback(saveNo, true);
        };
    </script>
</body>
</html>
