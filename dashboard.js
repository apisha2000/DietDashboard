document.addEventListener('DOMContentLoaded', function() {
    showContent('foodList'); // Load the food list by default
});

function showContent(type) {
    const content = document.getElementById('content');
    content.innerHTML = 'Loading...'; // Display a loading message

    fetch(type + '.php')  // Assuming you have 'chart.php', 'today.php', and 'foodList.php' set up
    .then(response => response.json())
    .then(data => {
        if (type === 'foodList') {
            renderFoodList(data);
        } else if (type === 'today') {
            renderTodayList(data);
        } else if (type === 'chart') {
            renderChart(data);
        }
    })
    .catch(error => {
        content.innerHTML = 'Error loading data.';
        console.error('Error:', error);
    });
}

function renderFoodList(foods) {
    const content = document.getElementById('content');
    let html = '<table><tr><th>Name</th><th>Fat</th><th>Carbs</th><th>Protein</th><th>Actions</th></tr>';
    foods.forEach(food => {
        html += `<tr>
                    <td>${food.name}</td>
                    <td>${food.fat}</td>
                    <td>${food.carbs}</td>
                    <td>${food.protein}</td>
                    <td>
                        <button onclick="editFood(${food.id})">Edit</button>
                        <button onclick="deleteFood(${food.id})">Delete</button>
                    </td>
                </tr>`;
    });
    html += '</table>';
    content.innerHTML = html;
}

function editFood(id) {
    console.log('Edit Food ID:', id);
    // Add code to handle food item editing
}

function deleteFood(id) {
    console.log('Delete Food ID:', id);
    // Add code to handle food item deletion
}

function renderTodayList(data) {
    // Implement the display logic for today's food list
}

function renderChart(data) {
    // Implement the display logic for the chart
}
