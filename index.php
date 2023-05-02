<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Создание и сохранение задач</title>
</head>
<body>
    <form method="POST" action="task-save.php">
        <p>Название задачи</p>
            <div class="task-description" id="task-description">
                <input type="text" placeholder="Название" name="task-name">
            </div>

        <p>Список подзадач</p>
            <div class="subtask-container">
                <div class="subtask">
                    <input type="text" class="sub" placeholder="Тут вводится подзадача" name="subtask_description[]">
                    <input type="number" class="num" name=subtask_hours[]>
                    <button class ="remove-but">Remove</button>
                </div>
            </div>

            <div class="button-container">
                <button type="button" class="add-subtask-but">Добавить подзадачу</button>
                <button type="submit" class="save-subtask-but" name="save">Сохранить в Localstorage</button>
                <button type="button" class="create-new-task">Создать новую задачу</button>
            </div>
            
            <script>
                function addSubtask(event) {
                    event.preventDefault(); 
                    const subtaskContainer = document.querySelector('.subtask-container');
                    const newSubtask = document.createElement('div');
                    const subtaskID = Date.now();
                        newSubtask.classList.add('subtask');
                        newSubtask.setAttribute('id', `subtask-${subtaskID}`);
                        newSubtask.innerHTML = `
                            <input type="text" class="sub" placeholder="Тут вводится подзадача" name="subtask_description[]" id="subtask-${subtaskID}-description">
                            <input type="number" class="num" name="subtask_hours[]" id="subtask-${subtaskID}-hours">
                            <button class ="remove-but">Remove</button>
                        `   ;
                    subtaskContainer.appendChild(newSubtask);
                }

                function removeSubtask(event) {
                    const subtask = event.target.closest('.subtask');
                    subtask.remove();
                }
                const addSubtaskButton = document.querySelector('.add-subtask-but');
                    addSubtaskButton.addEventListener('click', addSubtask);

                const subtaskContainer = document.querySelector('.subtask-container');
                    subtaskContainer.addEventListener('click', (event) => {
                    if (event.target.classList.contains('remove-but')) {
                        removeSubtask(event);
                    }
                });
                const createNewTaskButton = document.querySelector('.create-new-task');
                    createNewTaskButton.addEventListener('click', () => {
                    location.reload();
                });                              
            </script>

    </form>
</body>
</html>