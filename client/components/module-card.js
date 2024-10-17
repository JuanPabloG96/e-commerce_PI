export function moduleCard(props) {
  console.log(props);
  return `
    <div class="card">
      <h4 class="card-title">${props.title}</h4>
      <p class="card-description">${props.description}</p>
    </div>
  `;
}
