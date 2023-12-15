<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Yoga Class Cancellation</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="font-sans bg-gray-100">
  <div class="max-w-2xl mx-auto p-6">
    <div class="bg-white rounded-lg shadow-md p-8">
      <h1 class="text-3xl font-bold mb-4">Yoga Class Cancellation</h1>
      <p class="text-lg mb-6">Dear Yoga Enthusiast,</p>
      <p class="text-gray-700 mb-6">We regret to inform you that the upcoming {{ $details['className'] }} class scheduled for {{ $details['classDateTime']->format('jS F') }} at {{ $details['classDateTime']->format('g:i a') }} has been canceled due to unforeseen circumstances. We apologize for any inconvenience this may cause.</p>
      <p class="text-gray-700 mb-6">Please stay tuned for updates on rescheduling or future classes. In the meantime, feel free to reach out to us if you have any questions or concerns.</p>
      <p class="text-gray-700 mb-6">Thank you for your understanding.</p>
      <p class="text-gray-700">Best regards,<br>Your Gym Manager Studio Team</p>
    </div>
  </div>
</body>
</html>
