import React, {Component} from 'react';
import List from "./List";
import { connect } from "react-redux"
import FaciteActionButton from './FaciteActionButton';
import { DragDropContext } from "react-beautiful-dnd";
import { sort } from "../actions";
class App extends Component {
  onDragEnd = (result) => {
  const { destination, source, draggableId} = result;

    if(!destination) {
      return;
    }
    
    this.props.dispatch(
      sort(
        source.droppableId,
        destination.droppableId,
        source.index,
        destination.index,
        draggableId
      )
    )

  };

  // drag and drop og boards
  render() {
    const { lists } = this.props;
    return (
      <DragDropContext onDragEnd={this.onDragEnd}>
    <div className="App">
      <h2 style={{ textAlign: "center"}}>
        Facite
      </h2>
      
      <div style={styles.listsContainer}>
      { lists.map (list => (
      <List 
      listID={list.id} 
      key={list.id} 
      title={list.title} 
      cards={list.cards} />
      ))}
      <FaciteActionButton list />
        </div>
      </div>
      </DragDropContext>
   );
  }
}
// flexBox
const styles = {
    listsContainer: {
        display: "flex",
        flexDirection: "row"
    }
}
// for listene
const mapStateToprops = state => ({
  lists: state.lists
})


export default connect(mapStateToprops) (App);
