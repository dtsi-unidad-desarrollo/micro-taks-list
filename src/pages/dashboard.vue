<template>

<div id="app" class="container mt-3">
    <div class="row">
        <div class="col-md-4" v-for="(card, index) in cards" :key="index">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ card.title }}</h5>
                    <p class="card-text">{{ card.content }}</p>
                </div>
            </div>
        </div>
    </div>

    <form submit.prevent="addCard" class="mt-3">
        <div class="mb-3">
            <label for="title" class="form-label">Title:</label>
            <input type="text" id="title" v-model="newCard.title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content:</label>
            <textarea id="content" v-model="newCard.content" rows="3" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create Card</button>
    </form>
</div>


</template>
<script>
export default {}

const { createApp, ref } = Vue;

const app = createApp({
    setup() {
        const cards = ref([]);
        const newCard = ref({ title: '', content: '' });

        const addCard = () => {
            if (newCard.value.title && newCard.value.content) {
                cards.value.push({ title: newCard.value.title, content: newCard.value.content });
                newCard.value.title = '';
                newCard.value.content = '';
            } else {
                alert('Please fill out both title and content fields.');
            }
        }

        return { cards, newCard, addCard };
    }
});

</script>