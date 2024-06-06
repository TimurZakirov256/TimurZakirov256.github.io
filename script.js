// script.js
const searchInput = document.getElementById('searchInput');
const itemList = document.getElementById('itemList');

const items = [
    {
        title: 'Котёнок',
        description: 'Наши котята здоровы, вакцинированы и готовы стать частью вашей семьи. Выберите идеального друга из множества пород!',
        image: 'kitten.jpg',
        link: 'kitten.html'
    },
    {
        title: 'Хомячок',
        description: 'Наши хомячки здоровы, активны и готовы стать частью вашей семьи. Выберите идеального друга из множества видов!',
        image: 'hamster.jpg',
        link: 'hamster.html'
    },
    {
        title: 'Щенок',
        description: 'Наши щенки здоровы, вакцинированы и готовы стать частью вашей семьи. Выберите идеального друга из множества пород!',
        image: 'puppy.jpg',
        link: 'puppy.html'
    }
];

function renderItems(itemsToRender) {
    itemList.innerHTML = '';

    itemsToRender.forEach(item => {
        const card = document.createElement('div');
        card.classList.add('col-md-4', 'mb-4');

        const cardHTML = `
            <div class="card">
                <img src="${item.image}" alt="${item.title}" class="card-img-top">
                <div class="card-body">
                    <h3 class="card-title">${item.title}</h3>
                    <p class="card-text">${item.description}</p>
                    <a href="${item.link}" class="btn btn-primary">Подробнее</a>
                </div>
            </div>
        `;

        card.innerHTML = cardHTML;
        itemList.appendChild(card);
    });
}

function filterItems() {
    const searchText = searchInput.value.toLowerCase();
    const filteredItems = items.filter(item => {
        const itemText = `${item.title} ${item.description}`.toLowerCase();
        return itemText.includes(searchText);
    });

    renderItems(filteredItems);
}

function handleKeyDown(event) {
    if (event.key === 'Enter') {
        filterItems();
    }
}

document.addEventListener('DOMContentLoaded', function () {
    searchInput.addEventListener('input', filterItems);
    searchInput.addEventListener('keydown', handleKeyDown);

    renderItems(items);
});
