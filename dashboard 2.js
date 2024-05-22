document.addEventListener('DOMContentLoaded', function() {
    showContent('foodList'); // Load the food list by default if needed
});

function handleAddFood(event) {
    event.preventDefault();
    const formData = new FormData(event.target);

    fetch('add_food.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Food added successfully!');
            event.target.reset(); // Optionally clear the form fields
            // showContent('foodList'); // Refresh the food list or update UI as needed
        } else {
            alert('Error adding food: ' + data.error);
        }
    })
    .catch(error => {
        console.error('Error adding food:', error);
    });
}

function showContent(type) {
    const content = document.getElementById('content');
    content.innerHTML = 'Loading...'; // Show a loading message or spinner

    fetch(`${type}.php`) // Assumes you have endpoint setup for each type
    .then(response => response.json())
    .then(data => {
        if (type === 'foodList') {
            // Implement rendering logic for food list
            if (type === 'foodList') {
                fetch('foodList.php')
                .then(response => response.json())
                .then(foods => {
                    const content = document.getElementById('content');
                    let html = `<h2>Food List</h2>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Fat (grams)</th>
                                            <th>Carbs (grams)</th>
                                            <th>Protein (grams)</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>`;
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
                    html += `</tbody></table>`;
                    html +='<h2>Add a New Food Item</h2>';
                    html +='<form id="addFoodForm" onsubmit="handleAddFood(event)"> <input type="text" name="food_name" placeholder="Enter food name" required /> <input type="number" step="any" name="fat" placeholder="Enter fat content" required /><input type="number" step="any" name="carbs" placeholder="Enter carbohydrate content" required /><input type="number" step="any" name="protein" placeholder="Enter protein content" required /><button type="submit">Add Food</button></form>';
                    content.innerHTML = html;
                })
                .catch(error => {
                    console.error('Error fetching food')})}
            
        } else if (type === 'today') {
            // Implement rendering logic for today's food items
        } else if (type === 'chart') {
            // Implement rendering logic for chart data
        }
    })
    .catch(error => {
        content.innerHTML = 'Error loading data.';
        console.error('Error:', error);
    });
}
