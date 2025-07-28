document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('contactForm');
    const contactsList = document.getElementById('contactsList');

    // Load all contacts on page load
    fetchContacts();

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const formData = new FormData(form);
        const data = Object.fromEntries(formData.entries());

        const res = await fetch('api/create.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
        });

        const result = await res.json();
        alert(result.message);

        form.reset();
        fetchContacts();
    });

    async function fetchContacts() {
        const res = await fetch('api/read.php');
        const contacts = await res.json();

        if (!Array.isArray(contacts)) {
            contactsList.innerHTML = `<p>No contacts found or error.</p>`;
            return;
        }

        contactsList.innerHTML = contacts.map(c => `
            <div>
                <strong>${c.name}</strong> - ${c.email} - ${c.phone}
            </div>
        `).join('');
    }
});
