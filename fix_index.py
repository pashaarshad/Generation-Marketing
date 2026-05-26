import re

with open('index.html', 'r', encoding='utf-8') as f:
    content = f.read()

# Fix malformed google-ads-package link
content = re.sub(
    r'<a href=\"service-details\.html\?id=google-ads-package\.jpeg\"[^>]*><i class=\"fas fa-eye\"></i> View Full Details</button>',
    r'<a href="service-details.html?id=google-ads-package" class="btn-service"><i class="fas fa-eye"></i> See all the details, click here</a>',
    content
)

# Fix malformed meta-ad-package link
content = re.sub(
    r'<button class=\"btn-service\" data-bs-toggle=\"modal\" data-bs-target=\"#posterModal\"\s*data-poster=\"Services-posters/meta-ad-package\" class=\"btn-service\"><i class=\"fas fa-eye\"></i> See all the details, click here</a>',
    r'<a href="service-details.html?id=meta-ad-package" class="btn-service"><i class="fas fa-eye"></i> See all the details, click here</a>',
    content
)

# Fix any other remaining buttons
# Match <button class="btn-service" data-bs-toggle="modal" ... </button>
pattern = r'<button class=\"btn-service\" data-bs-toggle=\"modal\" data-bs-target=\"#posterModal\"\s*data-poster=\"Services-posters/(.*?)\.jpeg\" data-title=\".*?\"><i\s*class=\"fas fa-eye\"></i> View Full Details</button>'

def replace_btn(match):
    id_val = match.group(1)
    return f'<a href=\"service-details.html?id={id_val}\" class=\"btn-service\"><i class=\"fas fa-eye\"></i> See all the details, click here</a>'

content = re.sub(pattern, replace_btn, content, flags=re.DOTALL)

with open('index.html', 'w', encoding='utf-8') as f:
    f.write(content)

print('Success')
