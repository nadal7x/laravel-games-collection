if (document.querySelector('.chat-container')) {
  const chatContainer = document.querySelector('.chat-container');
  const chatClose = chatContainer.querySelector('.chat-close');
  const chatHeader = chatContainer.querySelector('.chat-header');
  const chatInput = chatContainer.querySelector('.chat-input');
  const chatButton = chatContainer.querySelector('.chat-button');

  chatContainer.addEventListener('click', (event) => {
    if (event.target.closest('.chat-close')) {
      if (chatContainer.classList.contains('active')) {
        chatContainer.classList.remove('active');
      }
    }

    if (event.target.closest('.chat-header')) {
      if (!chatContainer.classList.contains('active')) {
        chatContainer.classList.add('active');
      }
    }
    if (event.target.closest('.chat-button')) {
      const message = chatInput.value;
      if (message) {
        const chatMessage = document.createElement('div');
        chatMessage.classList.add('chat-message', 'user-message');
        chatMessage.innerHTML = `
        <div class="message-detail"></div>  
        <div class="chat-message-content">
          <p>${message}</p>
        </div>
      `;
        chatContainer.querySelector('.chat-messages').appendChild(chatMessage);
        chatInput.value = '';
        scrollToBottom();

        SendMessage(message);

      }
    }

  });

  chatContainer.addEventListener('keypress', (event) => {
    if (event.key === 'Enter') {
      const chatButton = chatContainer.querySelector('.chat-button');
      chatButton.click();
    }
  });

};

async function SendMessage(message) {
  if (!message) return;

  showTyping();
  scrollToBottom();
  const chatContainer = document.querySelector('.chat-container');

  const res = await fetch('/api/chat', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'Accept': 'application/json',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    },
    body: JSON.stringify({ message })
  });

  const data = await res.json();
  removeTyping();
  const responseList = `
  <ul style="padding-left: 1rem;">
    ${data.reply
      .split('\n')
      .filter(line => line.trim())
      .map(line => `<li>${line
        .replace(/^- /, '')
        .split('.')
        .map(part => part.trim())
        .filter(Boolean)
        .join('.<br>')}</li>`)
      .join('<br>')}
  </ul>
`;

  const chatMessage = document.createElement('div');
  chatMessage.classList.add('chat-message', 'bot-message');
  chatMessage.innerHTML = `
            <div class="message-detail"></div>  
            <div class="chat-message-content">
              ${responseList}
            </div>
          `;
  chatContainer.querySelector('.chat-messages').appendChild(chatMessage);
  scrollToBottom();
}


function showTyping() {
  const chatContainer = document.querySelector('.chat-container');
  const typing = document.createElement('div');
  typing.classList.add('chat-message', 'bot-message', 'typing');

  typing.innerHTML = `
    <div class="message-detail"></div>  
    <div class="chat-message-content">
      <div class="typing-dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  `;

  chatContainer.querySelector('.chat-messages').appendChild(typing);
  return typing;
}
function removeTyping() {
  const typing = document.querySelector('.typing');
  if (typing) typing.remove();
}
function scrollToBottom() {
  const chat = document.querySelector('.chat-container .chat-messages');
  chat.scrollTo({
    top: chat.scrollHeight,
    behavior: "smooth"
  });
}
