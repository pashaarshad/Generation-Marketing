import re

with open('index.html', 'r', encoding='utf-8') as f:
    content = f.read()

# Replace Service Buttons
pattern = r'<button class=\"btn-service\" data-bs-toggle=\"modal\" data-bs-target=\"#posterModal\"\s*data-poster=\"Services-posters/(.*?)\.jpeg\" data-title=\".*?\"><i\s*class=\"fas fa-eye\"></i> View Full Details</button>'

def replace_btn(match):
    id_val = match.group(1)
    return f'<a href=\"service-details.html?id={id_val}\" class=\"btn-service\"><i class=\"fas fa-eye\"></i> See all the details, click here</a>'

content = re.sub(pattern, replace_btn, content, flags=re.DOTALL)

# Replace Blog Images
blog_images = [
    'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=600&q=80',
    'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=600&q=80',
    'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&w=600&q=80',
    'https://images.unsplash.com/photo-1611162617474-5b21e879e113?auto=format&fit=crop&w=600&q=80',
    'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?auto=format&fit=crop&w=600&q=80',
    'https://images.unsplash.com/photo-1563986768609-322da13575f3?auto=format&fit=crop&w=600&q=80'
]

blog_pattern = r'<div class=\"blog-img\"><img src=\"Services-posters/.*?\.jpeg\" alt=\"Blog\"></div>'
matches = re.findall(blog_pattern, content)
for i, match in enumerate(matches):
    if i < len(blog_images):
        new_img = f'<div class=\"blog-img\"><img src=\"{blog_images[i]}\" alt=\"Blog\"></div>'
        content = content.replace(match, new_img, 1)

with open('index.html', 'w', encoding='utf-8') as f:
    f.write(content)

print('Success')
