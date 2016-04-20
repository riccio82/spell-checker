var React = require('react');
var Editor = require('draft-js');
var {Editor, EditorState, RichUtils} = require('draft-js');
var Controls = require('./Controls');;

class App extends React.Component {
	constructor(props) {
		super(props);
		this.state = {
			editorState: EditorState.createEmpty(), 
			language: "AUTO",
		};
		this.onChange = this.onChange.bind(this);
		this.changeLanguage = this.changeLanguage.bind(this);
		this.checkText = this.checkText.bind(this);
	}
	onChange(editorState) {
		this.setState({editorState})
		console.log(editorState.getCurrentContent().getPlainText() );
	}
	checkText() {
		console.log(this.state.editorState.getCurrentContent().getPlainText() );
	}
	changeLanguage(event) {
		var value = select.target.value;
		console.log(value);
	}
	render() {
	    const {editorState} = this.state;
	    return (
	    	<div>
	    	<Controls editorState={this.state.editorState} />
	    	<div className="editor-container">
		        <Editor
		          editorState={this.state.editorState}
		          onChange={this.onChange}
		          placeholder="Scrivi..."
		        />
		    </div>
		    </div>
	    )
  }
}
module.exports = App;




