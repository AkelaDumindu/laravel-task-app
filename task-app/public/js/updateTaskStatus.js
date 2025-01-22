function updateTaskStatus(taskId, isCompleted) {
    fetch(`/tasks/${taskId}/update-status`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
        },
        body: JSON.stringify({ is_completed: isCompleted }),
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const label = document.querySelector(`#taskStatusLabel${taskId}`);
                const checkbox = document.querySelector(`#taskStatus${taskId}`);

                // Update the label text and styles dynamically
                if (data.task.is_completed) {
                    label.textContent = 'Completed';
                    label.classList.remove('text-secondary');
                    label.classList.add('text-success');
                } else {
                    label.textContent = 'Pending';
                    label.classList.remove('text-success');
                    label.classList.add('text-secondary');
                }
            } else {
                alert('Failed to update task status.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while updating the task status.');
        });
}
