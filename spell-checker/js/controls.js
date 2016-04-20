var React = require('react');
class Controls extends React.Component {
	constructor(props) { 
		super(props);
		this.state = {
			
		};
		this.changeLanguage = this.changeLanguage.bind(this);
		this.checkText = this.checkText.bind(this);
	}
	checkText() {
		console.log(this.props.editorState.getCurrentContent().getPlainText() );
	}
	changeLanguage(event) {
		var value = event.target.value;
		console.log(value);
	}
	render() {
	    const {editorState} = this.state;
	    return (
	    	<div className="editor-buttons-container">
	    		<button onClick={this.checkText}>Controlla</button>
	    		<select onChange={this.changeLanguage}>
				  <option value="AUTO">AUTO</option>
				  <option value="Italiano">Italiano</option>
				  <option value="Inglese">Inglese</option>
				  <option value="Spagnolo">Spagnolo</option>
				</select>
	    	</div>
	    )
  }
}
module.exports = Controls;