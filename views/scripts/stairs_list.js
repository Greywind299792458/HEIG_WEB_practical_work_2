function editStairs(id) {
    // redirects to the stairs form page
    window.location.href = `/stairs/form/${id}`
}
function addRating(stairsId) {
    // redirects to the rating form page
    window.location.href = `/rating/form/${stairsId}`
}
function editRating(stairsId, ratingId) {
    // redirects to the rating form page (with the rating id as we want to edit it)
    window.location.href = `/rating/form/${stairsId}/${ratingId}`
}
function deleteRating(id) {
    sendDeleteRequest(`/rating/${id}`, 'Êtes-vous sûr de vouloir supprimer cet avis?')
}
function deleteStairs(id) {
    sendDeleteRequest(`/stairs/${id}`, 'Êtes-vous sûr de vouloir supprimer cet escalier?')
}
function sendDeleteRequest(url, message) {
    var xhr = new XMLHttpRequest();
    xhr.open('DELETE', url, true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    // asks user if they really want to do the action
    if (confirm(message)) {
        xhr.onload = function () {
            if (xhr.status === 200) {
                var result = JSON.parse(xhr.responseText);
                if (result.success) {
                    window.location.href = '/stairs/list?success=true';
                } else {
                    window.location.href = '/stairs/list?success=false&error=Erreur lors de la suppression';
                }
            } else {
                window.location.href = '/stairs/list?success=false&error=' + result.error;
            }
        };
        xhr.onerror = function () {
            window.location.href = '/stairs/list?success=false&error=Erreur réseau lors de la suppression';
        };
        xhr.send();
    }
}