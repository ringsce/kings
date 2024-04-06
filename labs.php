<?php

// GitHub Organization Name
$organization = "ringsce";

// GitHub Personal Access Token
$token = "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";

// Log file path
$logFile = "github_projects.log";

// Function to fetch projects from GitHub API
function fetchProjects($organization, $token) {
    $url = "https://api.github.com/orgs/$organization/projects";

    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => array(
            "Authorization: token $token",
            "User-Agent: PHP"
        )
    ));

    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}

// Function to display projects and log them
function displayProjects($projects, $logFile) {
    $output = "Projects:\n";
    foreach ($projects as $project) {
        $output .= "- {$project['name']}\n";
    }
    echo $output;

    // Log projects
    file_put_contents($logFile, $output, FILE_APPEND);
}

// Fetch and display projects initially
$projects = fetchProjects($organization, $token);
displayProjects($projects, $logFile);

// Update sync every 5 minutes
while (true) {
    sleep(300); // 5 minutes

    // Fetch and display updated projects
    $projects = fetchProjects($organization, $token);
    displayProjects($projects, $logFile);
}

?>

