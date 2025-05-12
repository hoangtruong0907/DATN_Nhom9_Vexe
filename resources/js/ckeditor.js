import Plugin from '@ckeditor/ckeditor5-core/src/plugin';
import ButtonView from '@ckeditor/ckeditor5-ui/src/button/buttonview';
import fullscreenIcon from '@ckeditor/ckeditor5-core/theme/icons/fullscreen.svg';

class FullScreen extends Plugin {
    init() {
        const editor = this.editor;

        editor.ui.componentFactory.add('fullScreen', (locale) => {
            const view = new ButtonView(locale);
            view.set({
                label: 'Fullscreen',
                icon: fullscreenIcon,
                tooltip: true,
            });
                    
            // Xử lý khi icon được click
            // ...
            
            return view;
        });
    }
}
class FullScreen extends Plugin {
    init() {
            //...
            
            // Xử lý khi icon được click
            let etat = 0;
            view.on('execute', () => {
                if (etat == 1) {
                    editor.sourceElement.nextElementSibling.removeAttribute('id');
                    document.body.removeAttribute('id');
                    etat = 0;
                } else {
                    editor.sourceElement.nextElementSibling.setAttribute('id','fullscreeneditor');
                    document.body.setAttribute('id', 'fullscreenoverlay');
                    etat = 1;
                }
            });

            return view;
        };
}

ClassicEditor.builtinPlugins = [
    Essentials,
    Paragraph,
    Bold,
    Italic,
    Underline,
    Heading,
    // Thêm plugin Table và FullScreen vào danh sách
    Table,
    TableToolbar,
];
ClassicEditor.defaultConfig = {
    toolbar: {
        items: [
            'bold',
            'italic',
            'paragraph',
            '|',
            'fullScreen'
        ],
    },
}
